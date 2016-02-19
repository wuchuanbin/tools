#!/bin/bash
# 要备份的数据库名，多个数据库用空格分开
databases=(api db_handybest_official) 
# 备份文件要保存的目录
basepath='/data/backup/lanmysql/'
if [ ! -d "$basepath" ]; then
  mkdir -p "$basepath"
fi
# 循环databases数组
for db in ${databases[*]}
  do
    # 备份数据库生成SQL文件
    /bin/nice -n 19 /data/server/maria/bin/mysqldump -uroot -pshuishanghuayuan --database $db > $basepath$db-$(date +%Y%m%d).sql
    
    # 将生成的SQL文件压缩
    /bin/nice -n 19 tar zPcf $basepath$db-$(date +%Y%m%d).sql.tar.gz $basepath$db-$(date +%Y%m%d).sql
    
    # 删除7天之前的备份数据
    find $basepath -mtime +7 -name "*.sql.tar.gz" -exec rm -rf {} \;
  done
  # 删除生成的SQL文件
  rm -rf $basepath/*.sql