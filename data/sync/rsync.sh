#!/bin/bash

rsync -zrCcvl --delete-after --exclude-from config/rsync_exclude * /media/bds
/media/bds/symfony cc