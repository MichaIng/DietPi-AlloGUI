systemctl is-active mpd | grep -cim1 'active';

systemctl is-active roonbridge | grep -cim1 'active';

systemctl is-active shairport-sync | grep -cim1 'active';

systemctl is-active shairport-sync | grep -cim1 'active';

systemctl is-active hostapd | grep -cim1 'active';

ip -br a s eth0 | mawk '{gsub(/\/[0-9]*/,"");print $3}';

cat /etc/hostname;

sed -n '/^[[:blank:]]*CONFIG_SOUNDCARD=/{s/^[^=]*=//p;q}' /boot/dietpi.txt;