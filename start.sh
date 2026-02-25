#!/usr/bin/env bash
# ============================================================
#  Exam Seat Management System — Quick-Start Script
#  Usage:  bash start.sh
# ============================================================
set -e

PORT="${PORT:-8080}"
DB_USER="${DB_USER:-root}"
DB_PASS="${DB_PASS:-}"
DB_NAME="exam_hall"

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
CYAN='\033[0;36m'
NC='\033[0m'

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo -e "${CYAN}"
echo "  ╔══════════════════════════════════════════════╗"
echo "  ║     Exam Seat Management System              ║"
echo "  ║     Starting server on port ${PORT}...          ║"
echo "  ╚══════════════════════════════════════════════╝"
echo -e "${NC}"

# ── 1. Check PHP ──────────────────────────────────────────
if ! command -v php &>/dev/null; then
    echo -e "${RED}✗ PHP not found. Please install PHP 7.4+ and try again.${NC}"
    exit 1
fi
PHP_VER=$(php -r "echo PHP_MAJOR_VERSION;")
echo -e "${GREEN}✓ PHP $(php -r 'echo PHP_VERSION;') found${NC}"

# ── 2. Check MySQL / database ─────────────────────────────
if command -v mysql &>/dev/null; then
    MYSQL_CMD="mysql -u${DB_USER}"
    [ -n "$DB_PASS" ] && MYSQL_CMD="${MYSQL_CMD} -p${DB_PASS}"

    if $MYSQL_CMD -e "USE ${DB_NAME};" 2>/dev/null; then
        echo -e "${GREEN}✓ Database '${DB_NAME}' already exists${NC}"
    else
        echo -e "${YELLOW}⚙  Creating database '${DB_NAME}'...${NC}"
        $MYSQL_CMD -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4;" 2>/dev/null || true
        $MYSQL_CMD "${DB_NAME}" < "${SCRIPT_DIR}/exam_hall.sql" 2>/dev/null || true
        echo -e "${GREEN}✓ Database '${DB_NAME}' created and populated${NC}"
    fi

    # Update dbconnect.php with the provided credentials
    php -r "
        \$file = '${SCRIPT_DIR}/dbconnect.php';
        \$content = file_get_contents(\$file);
        \$content = preg_replace('/\\\$password\s*=\s*\"[^\"]*\";/', '\\\$password = \"${DB_PASS}\";', \$content);
        \$content = preg_replace('/\\\$username\s*=\s*\"[^\"]*\";/', '\\\$username = \"${DB_USER}\";', \$content);
        file_put_contents(\$file, \$content);
    " 2>/dev/null || true
else
    echo -e "${YELLOW}⚠  mysql client not found. Skipping database setup.${NC}"
    echo -e "${YELLOW}   Please import exam_hall.sql manually and set credentials in dbconnect.php${NC}"
fi

# ── 3. Kill any process already on the port ────────────────
if lsof -ti tcp:"${PORT}" &>/dev/null 2>&1; then
    echo -e "${YELLOW}⚙  Port ${PORT} in use — stopping existing process...${NC}"
    kill "$(lsof -ti tcp:${PORT})" 2>/dev/null || true
    sleep 1
fi

# ── 4. Start PHP built-in server ──────────────────────────
echo -e "${CYAN}⚙  Starting PHP server on port ${PORT}...${NC}"
cd "${SCRIPT_DIR}"
php -S "0.0.0.0:${PORT}" > /tmp/exam-seat-server.log 2>&1 &
SERVER_PID=$!
sleep 1

if kill -0 "${SERVER_PID}" 2>/dev/null; then
    echo -e "${GREEN}✓ Server started (PID: ${SERVER_PID})${NC}"
    echo ""
    echo -e "${GREEN}  ┌─────────────────────────────────────────────┐${NC}"
    echo -e "${GREEN}  │  App running at: http://localhost:${PORT}       │${NC}"
    echo -e "${GREEN}  │                                             │${NC}"
    echo -e "${GREEN}  │  Admin login:   admin / admin               │${NC}"
    echo -e "${GREEN}  │  Student login: Register Number + DOB       │${NC}"
    echo -e "${GREEN}  │  Staff login:   Register Number + Password  │${NC}"
    echo -e "${GREEN}  │                                             │${NC}"
    echo -e "${GREEN}  │  Press Ctrl+C to stop the server            │${NC}"
    echo -e "${GREEN}  └─────────────────────────────────────────────┘${NC}"
    echo ""

    # Open in browser if possible
    if command -v xdg-open &>/dev/null; then
        xdg-open "http://localhost:${PORT}" &>/dev/null &
    elif command -v open &>/dev/null; then
        open "http://localhost:${PORT}" &>/dev/null &
    elif command -v google-chrome &>/dev/null; then
        google-chrome "http://localhost:${PORT}" &>/dev/null &
    elif command -v chromium-browser &>/dev/null; then
        chromium-browser "http://localhost:${PORT}" &>/dev/null &
    fi

    # Wait for Ctrl+C
    trap "echo -e '\n${YELLOW}Stopping server...${NC}'; kill ${SERVER_PID} 2>/dev/null; echo -e '${GREEN}Done.${NC}'; exit 0" INT TERM
    wait "${SERVER_PID}"
else
    echo -e "${RED}✗ Failed to start server. Check /tmp/exam-seat-server.log for details.${NC}"
    exit 1
fi
