docker run --rm -v $(pwd)/docs/api:/api --workdir /api ghcr.io/redocly/redoc/cli:v2.0.0-rc.72 build openapi.yaml
