#!/bin/sh
set -eu

cd "$(dirname "$0")"
docker compose down
echo "RuangTemu dihentikan. Data MySQL tetap tersimpan di volume Docker."
