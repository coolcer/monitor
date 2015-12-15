# monitor
这是一个php的web服务，一个php的post接口
客户端可通过任何方式将客户端的监控数据post给服务端,post.php接收到请求之后会将书记分析后放入数据库。
注意：post参数中ssid是必须存在的，且客户端post参数必须与程序里的一致，否则服务端是不接收任何请求。
shell：curl -d "ssid=asdasdasdasd&hostname=asdasdas&cpu=asdasd" "http://xxx.xxx.com/post.php"

服务端会用到数据库，我已经将数据库的表结构导出放到了github上，创建数据库并导入，配置config.php的数据库配置，最后发布为web服务器，即可。
