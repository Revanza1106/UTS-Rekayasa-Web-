#!/bin/sh
set -eu

cd "$(dirname "$0")"

if [ ! -f .env ]; then
    cp .env.example .env
fi

if ! docker info >/dev/null 2>&1; then
    echo "Docker Engine belum dapat diakses. Buka Docker Desktop, lalu jalankan ./start.sh lagi." >&2
    exit 1
fi

docker compose up --build -d

port=""
attempt=0
while [ "$attempt" -lt 30 ]; do
    port="$(docker compose port app 80 2>/dev/null | awk -F: '{print $NF}' | tail -n 1)"
    if [ -n "$port" ]; then
        break
    fi
    attempt=$((attempt + 1))
    sleep 1
done

if [ -z "$port" ]; then
    docker compose logs --tail=80 app
    echo "Port aplikasi belum tersedia. Periksa log di atas." >&2
    exit 1
fi

url="http://127.0.0.1:${port}"
attempt=0
while [ "$attempt" -lt 45 ]; do
    if curl --fail --silent "$url" >/dev/null 2>&1; then
        echo "RuangTemu siap dibuka: $url"
        if command -v open >/dev/null 2>&1; then
            open "$url" >/dev/null 2>&1 || true
        fi
        exit 0
    fi
    attempt=$((attempt + 1))
    sleep 2
done

docker compose logs --tail=100 app db
echo "Container sudah dibuat, tetapi halaman belum merespons. Periksa log di atas." >&2
exit 1
