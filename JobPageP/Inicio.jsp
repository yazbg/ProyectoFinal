<%-- 
    Document   : Inicio
    Created on : Jun 13, 2024, 01:40:49 PM
    Author     : Bg
--%>
<%
    String cookieName = "register";
    Cookie[] cookies = request.getCookies();
    boolean existeCookie = false;
    for(Cookie cookie : cookies){
        if(cookieName.equals(cookie.getName())){
        existeCookie= true;
        }
    }
    if(existeCookie){
        response.sendRedirect("register.php");
    }
%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Register </title>
    </head>
    <body>
        <h1></h1>
        <p> </p>
        <form action="<%= getServletContext().getContextPath() %>/Login" method="POST">
            <P> 
                <input type="text" name="usuario"/>
                <input type="submit" value="Responder"/>
                <input type="text" name="correo"/>
                <input type="submit" value="Responder"/>
                <input type="text" name="password"/>
                <input type="submit" value="Responder"/>
                <input type="text" name="confirmpassword"/>
                <input type="submit" value="Responder"/>
            </P>
        </form>
    </body>
</html>
