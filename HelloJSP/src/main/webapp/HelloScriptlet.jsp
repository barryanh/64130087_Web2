<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hello VemOni</title>
</head>
<body>

	<h1>Hello VemOni</h1>
		<h2>Scriptlet</h2>
		<%
			// Chú thích của Java
			int a = 3;
			int b = 4;
			int c = a + b;
			// Xuất ra trang web, tại ngay vị trí này
			out.print(a);
			out.print(" + ");
			out.print(b);
			out.print(" = ");
			out.print(c);
		%>
		<h2>
			<hr/>
			Hết rồi
		</h2>

</body>
</html>