# Update version file by getting the last tag from git.
git describe --tags $(git rev-list --tags --max-count=1) > api/.version.txt
