# 未知表白墙

**欢迎使用未知表白墙！这是本程序的README.MD哦！**

## 这款表白墙献给镜音双子

### DEMO

网页链接：https://love.unknown-o.com

### 联系作者

作者邮箱：i#mr-wu.top（把#替换为@）

作者博客：https://www.wunote.cn

### **本项目的官方Git仓库**

内网仓库：[https://git.mr-wu.top/UnknownO/loveway-php](https://git.mr-wu.top/UnknownO/loveway-php)

Github仓库：[https://github.com/unknown-o/loveway-php](https://github.com/unknown-o/loveway-php)

Gitee仓库：https://gitee.com/mr-wu-code/loveway-php

### 这是一个非常简洁的说明

是我使用我的业余时间随便开发的一款非常简洁却非常美观的表白墙。（献给最可爱的镜音双子）

### 程序特性

1.使用**MDUI**开发，超级好看的**扁平化**设计

2.全局**Pjax**刷新，保证了流畅的体验和音乐不中断

3.当图片加载失败时，**自动**采用随机图片

4.这款表白墙献给**镜音双子**

### 安装教程

#### 如果你是宝塔用户

你可以直接从**应用商城**-->**一键部署**-->**搜索**-->**未知表白墙**-->**一键部署**。即可一键部署到您的宝塔面板上。

但是，请一定要注意修改**config.php**中的**ADMIN_USER**和**ADMIN_PASS**变量以修改默认账号密码，否则可能会被盗登后台

#### 如果你要手动部署

您可以从官方仓库中下载源码或最新发行版，然后在您的站点解压，并且确保**index.php**在您的**站点根目录**。完成上述后操作，请导入文件夹根目录的**import.sql**，并且把根目录中**config.php**中的**DB_NAME/DB_USER/DB_PASS**变量分别替换成你的数据库的**用户名/名称/密码**，然后修改**ADMIN_USER**和**ADMIN_PASS**为你自己想要的管理账号密码（一定要**修改**默认账号密码，否则可能会被使用默认账号密码登录修改站点配置！）

### 注意事项

#### 一定要修改默认用户名密码

默认用户名：**kagamine**

默认密码：**kagamine1234**

（不会告诉你这是**镜音双子**的**英文**名称

##### 修改方法

修改**config.php**中的**ADMIN_USER**和**ADMIN_PASS**变量以修改默认账号密码

#### 伪静态规则仅支持Nginx

因为懒得装**Apache**环境，所以目前伪静态规则仅写了**Nginx**的

所以....如果有大佬的话，**欢迎**帮忙写哦（写完可以提交个PR，2333）

#### 可以删除的文件

如果你**安装完成**后，您**可以删除**以下文件

**auto_install.json**（宝塔自动部署文件）

**GPL2.0 Explain.md**（GPL2.0人话版解释）

**import.sql**（初始数据库）

**nginx.rewrite**（nginx伪静态规则）

**readme.md**（本表白墙简单介绍文件）

### 开源许可证

本项目采用**GNU General Public License (GPL) V2**许可证开源

详情见根目录**LICENSE**文件（如果看不懂请查看根目录**人话版**GPL2开源协议说明[**GPL2.0 Explain.md**]）

如果**不同意**此许可证，请**不要**使用本程序

### 如何对本项目贡献

有很多方法可以帮助项目：**记录bug**、**提交PR请求**、**报告问题**和**提出优秀的建议**。**即使**您对存储库拥有**推送权限**，也应该在需要时创建**个人fork**并在那里创建功能分支。这样可以保持主存储库的**干净**，并且您的个人工作流程不受影响。我们也对你对这个项目未来的反馈感兴趣。您可以通过**issue** **tracker**提交建议或功能请求。为了使这个过程更有效，我们要求这些包括更多的信息来帮助更清楚地**定义**它们。

There are many ways to contribute to the project: **logging bugs**, **submitting pull requests**, **reporting issues**, and **creating suggestions**. **Even if** you have **push rights** on the repository, you should create a personal fork and create feature branches there when you need them. This keeps the main repository **clean**, and your personal workflow cruft out of sight. We're also interested in your feedback for the future of this project. You can submit a suggestion or feature request through the issue tracker. To make this process more effective, we're asking that these include more information to help **define** them more clearly.























