CREATE DATABASE ctf CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
use ctf;

create table news (id INT PRIMARY KEY,title VARCHAR(120),content VARCHAR(1024)) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;;
insert into news values(1,'等保是什么','等保全称为“信息系统安全等级保护”，先改为“网络安全等级保护”，是指对网络和信息系统按照重要性等级分级别保护的一种工作。安全保护等级越高，安全保护能力就越强。');
insert into news values(2,'等保1.0和2.0区别是什么？','首先，2.0纳入了《中华人民共和国安全法》规定的重要事项：其次，1.0只针对网络和信息系统，2.0则把云计算、大数据、物联网等新业态也纳入了监管；最后，2.0把监管对象从体制内拓展到了全社会。');
insert into news values(3,'等保2.0测评内容','等级保护测评分为安全物理环境、安全通信网络、安全区域边界、安全计算环境、安全管理中心、安全管理制度、安全管理机构、安全人员管理、安全建设管理、安全运维管理十个层面。');
insert into news values(4,'我顶你个肺！','我顶！我顶！我顶你个肺！晚晚捱夜睇波大声嗌！钟意球队成日都输晒！日日返工觉得周身唔自在！饮咗三杯咖啡都系未醒晒！最怕炎热搭车路塞晒！塞到迟到挨闹真失礼！');