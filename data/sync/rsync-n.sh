#!/bin/bash

rsync -zrCcvl --dry-run --delete-after --exclude-from config/rsync_exclude * /media/bds