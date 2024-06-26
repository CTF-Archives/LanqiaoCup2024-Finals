# 蓝桥杯 2024 网络安全赛道 全国总决赛
 
题目附件可于 Releases 下载

## 0x100

小蓝在学习 RSA 知识，尝试把原文给移位后再补 0，这回你可以解密出原文吗？

## backleak

小蓝在服务器上直接编辑文件时，不小心意外退出环境。

## sqldata

wireshark 在手，数据包分析没问题。

## orsa

小蓝发现一个文件中写明了一些参数的数值，只知道是 rsa 加密，根据这些数值解答题目。

## pingping

你是一个网络安全管理员，负责监控公司内部网络的安全性。最近，你收到了关于内部网络存在异常 ICMP 流量的报告。你决定分析这些流量，以确定是否将公司的机密信息传输到了外部。

## nothing

> 官方的附件的文件名是个错别字，它写的是 _noting_

小蓝获取了一个被加密的文档，解开之后发现什么内容也没有，请帮小蓝获取文档中的信息。

## LFSR

小蓝在学习逆向工程时，遇到了 LFSR 流加密问题。

## gettingstarted

你是一个网络安全管理员，在使用一个二进制登陆软件时，发现存在超出预期的内存访问。通过该漏洞获取系统中的重要信息。

## ezmaze

小蓝是一个热衷于计算机程序设计的大学生，最近他在使用 Rust 来开发一个迷宫游戏。然而，小蓝希望他的代码能够对其他人保持神秘，并且防止其被逆向工程。为了实现这个目标，他决定要对他的程序进行加壳处理。现在你还能破解吗？（提交的 md5 值为小写）

## babyheap

小蓝同学第二次尝试使用 C 语言编写程序时，由于缺乏良好的安全开发经验和习惯，导致了未初始化的指针漏洞（Use After Free，UAF 漏洞）。在他的程序中，他没有正确释放动态分配的内存空间，并且在之后继续使用了已经释放的指针，造成了悬空指针的问题。这种错误会导致程序在运行时出现未定义的行为，可能被恶意利用来执行恶意代码，破坏数据或者系统安全性，你能找到该漏洞并利用成功吗？

## java_again

我，小蓝，正在使用高版本的 Java 来开发一个大型的 Web 应用。在项目构建的过程中，安全问题是我最关心的部分之一，对于 Java 项目，反序列化可能会引发潜在的安全威胁，所以我决定在反序列化的地方加强防护。为了避免在反序列化的时候引发安全问题，我决定添加一个 WAF 类来拦截那些具有潜在威胁的类。

## dirty_data

> 本题需要暴露两个端口，一个用于网页的访问，一个用于 SSH

近日，数据库管理员小蓝发现数据库中存在脏数据，请你帮助小蓝去掉数据库中的脏数据。若是误删其他正常数据的话建议重新下发环境。当去除脏数据后，等待一分钟左右，/flag 就会变为可读权限。（本题下发后会有一个 ssh 地址、账号密码，选手可通过 ssh 来访问环境）