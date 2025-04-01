package vemoni.edu.TongHopGK.controller;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import ch.qos.logback.core.joran.spi.HttpUtil.RequestMethod;
import jakarta.servlet.http.HttpServletRequest;
import vemoni.edu.TongHopGK.model.Student;

@Controller
public class HomeController {
	ArrayList<Student> sinhViens = new ArrayList<Student>(Arrays.asList(
			new Student("64130087", "Trương Quốc Anh", 8.5),
			new Student("64130005", "Hoàng Duy An", 9.0),
			new Student("64130004", "Dương Thị Ánh Hồng", 8.6),
			new Student("64130003", "Phạm Trung Kiên", 7.7)
			));
	
	@GetMapping("/")
	public String index() {
		return "index";
	}
	
	@GetMapping("/about")
	public String about() {
		return "about";
	}
	
	@GetMapping("/studentList")
	public String toList(ModelMap model) {
		model.addAttribute("svs", sinhViens);
		return "list";
	}
	
	@GetMapping("/addNew")
	public String toNew(ModelMap model) {
		return "newStudent";
	}
	
	@RequestMapping(value = "/add", method = RequestMethod.POST)
	public String login(ModelMap model, HttpServletRequest request) {
		String mssv = request.getParameter("mssv");
		String hoTen = request.getParameter("hoTen");
		double diemTB = Double.parseDouble(request.getParameter("diemTB"));
		Student student = new Student(mssv, hoTen, diemTB);
		sinhViens.add(student);
		model.addAttribute("sv", sinhViens);
		return "list";
	}
}
