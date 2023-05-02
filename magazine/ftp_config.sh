apt-get update
apt-get install nano -y
apt-get install vsftpd -y
apt-get install ufw -y
apt-get install iptables -y
cp /etc/vsftpd.conf /etc/vsftpd.conf.orig
ufw enable
ufw allow 20/tcp
ufw allow 21/tcp
ufw allow 4550:4600/tcp
adduser admin
echo "admin:exemplar" | chpasswd
chown nobody:nogroup  /home/admin/
chmod a-w /home/admin/
mkdir /home/admin/files
chown admin:admin /home/admin/files
cp vsftpd.conf /etc/vsftpd.conf
service vsftpd restart