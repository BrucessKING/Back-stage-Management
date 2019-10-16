# Back-stage-Management
使用php+mysql搭建的一个后台管理页面<br>
前端使用到的js框架为jQuery<br>
css框架为layui<br>
页面如下：
![image](https://github.com/BrucessKING/Back-stage-Management/blob/master/upload/%E8%AF%B4%E6%98%8E%E5%9B%BE%E7%89%871.jpg)


下载完后，请根据你的数据库配置，设置config.int里面的值

# 创建message_board表的过程如下
导入message_board.sql：<br>
进入mysql数据库控制台，如<br>
``mysql -u root -p``<br>
``mysql>use 数据库名``<br>
然后使用source命令，后面参数为脚本文件(如这里用到的message_board.sql)<br>
``mysql>source message_board.sql``<br>
