<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Xác thực đăng nhập</title>
</head>
<body>

	<%-- 	<%@ page contentType="text/html;charset=UTF-8" language="java" %> --%>
<%
    String username = request.getParameter("email");
    String password = request.getParameter("password");

    if ("adminvemoni@gmail.com".equals(username) && "adminvemoni".equals(password)) {
        response.sendRedirect("userProfile.html");
    } else {
        response.sendRedirect("login.html");
    }
%>

</body>
</html>