package vn.edu.vemoni.BMI;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class BMI
 */
@WebServlet("/BMI")
public class BMI extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public BMI() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
		response.setCharacterEncoding("utf-8");
		PrintWriter print = response.getWriter();
		String styles = "<style>"
	            + "body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }"
				+ "h2 {margin-bottom: 20px; font-size: 24px; color: #333;}"
	            + "form-container {background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 30px; width: 100%; max-width: 400px; text-align: center;}"
				+ "form-group {margin-bottom: 20px;}"
	            + "input[type=\"number\"]:focus {border: 1px solid #4CAF50;}"
	            + "form { background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 30px; width: 100%;  max-width: 400px; text-align: center; }"
	            + "label { font-size: 16px; color: #555; margin-bottom: 5px; display: block; }"
	            + "input[type='text'] { width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; outline: none; transition: border 0.3s ease; }"
	            + "input[type='submit'] { background: #28a745; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }"
	            + "input[type='submit']:hover { background-color: #45a049; }"
	            + "</style>";

	    print.append("<html><head><title>BMI Calculator</title>" + styles + "</head><body>");
	    print.append("<div class=\"form-container\">"
	    		+ "<h2>Nhập Cân Nặng và Chiều Cao</h2>"
	    		+ "<form method='POST' action='/BMI/BMI'>"
	    		+ "<div class=\"form-group\">"
	            + "<label>Cân nặng (kg):</label>"
	            + "<input type='text' name='weight' placeholder='Nhập cân nặng'>"
	            + "</div>"
	            + "<br />"
	            + "<div class=\"form-group\">"
	            + "<label>Chiều cao (m):</label>"
	            + "<input type='text' name='height' placeholder='Nhập chiều cao'>"
	            + "</div>"
	            + "<br />"
	            + "<input type='submit' value='Tính BMI'>"
	            + "</form>");
	    print.append("</body></html>");
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		response.setContentType("text/html");
		response.setCharacterEncoding("utf-8");
		String valueHeight = request.getParameter("height");
		String valueWeight = request.getParameter("weight");
		float height = Float.parseFloat(valueHeight);
		float weight = Float.parseFloat(valueWeight);
		float BMI = weight / (height * height);
		PrintWriter print = response.getWriter();
		print.append("Bạn đang "
				+ checkBMI(BMI));
	}
	
	private String checkBMI(float BMI) {
		if(BMI >= 30) return "Béo phì";
		else if (BMI >= 25) return "Thừa cân";
		else if (BMI >= 18.5f) return "Bình thường";
		else return "Gầy";
	}

}
