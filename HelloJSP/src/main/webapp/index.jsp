<%@ page import = "java.util.Date" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Demo JSP</title>
</head>
<body>

	<h1>Demo JSP</h1>
	<%= new Date().toString() %>
	<%! int a = 10; %>
	<b>
	<% 
		out.print(a);
	%>
	</b>

</body>
</html>