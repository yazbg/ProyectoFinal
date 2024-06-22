/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */
package servlets;

//import jakarta.servlet.*;
//import jakarta.servlet.http.*;
import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.util.Enumeration;

/**
 *
 * @author angel.martinez
 */
public class servlet1 extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title> register</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet servlet1</h1>");
            out.println("<div>");
            out.println("<p> Datos <p>");
            out.println("<ul>");
            out.println("<li>");
            String param1 = request.getParameter("usuario");
            out.println("parametroContexto1 = " + request.getParameter("correo"));
            out.println("</li>");
            out.println("<li>");
            String param = request.getParameter("contra");
            out.println("parametroContexto2 = " + request.getParameter("confcontra"));
            out.println("</li>");
            Enumeration<String> ParameterNames = getServletContext().getInitParameterNames();
            while(ParameterNames.hasMoreElements()){
                String pName = ParameterNames.nextElement();
                out.println("<li>" + usuario + " =" + getServletContext().getInitParameter(usuario) + "</li>");
            }
            out.println("<p> </p>");
            Enumeration<String> initParamNames = getInitParameterNames();
            while(initParamNames.hasMoreElements()){
                String pName = initParamNames.nextElement();
                out.println("<li>" + pName + " =" + getInitParameter(pName) + "</li>");
            }
            out.println("</ul>");
            out.println("</div>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
