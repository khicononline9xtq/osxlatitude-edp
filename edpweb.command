#!/bin/bash
echo Starting up EDP;
cd /Extra/bin/lws/
java -cp jars/jetty-6.1.15.pre0.jar:jars/jetty-util-6.1.15.pre0.jar:jars/servlet-api-2.5-20081211.jar:jars/javamail-141.jar:jars/quercus.jar:jars/resin-util.jar:. LocalPHPWebServer /Extra/bin/html &
sleep 3;
open /Extra/storage/apps/EDPweb.app
