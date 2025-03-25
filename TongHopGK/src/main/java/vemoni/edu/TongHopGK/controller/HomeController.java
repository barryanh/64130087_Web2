package vemoni.edu.TongHopGK.controller;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;

import vemoni.edu.TongHopGK.model.Student;

@Controller
public class HomeController {
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
		ArrayList<Student> sinhViens = new ArrayList<Student>(Arrays.asList(
				new Student("64130282", "Nguyễn Huy Đạt", 8.5),
				new Student("64130087", "Trương Quốc Anh", 9.0),
				new Student("64139504", "Nguyễn Vũ Hòa", 8.6)
				));
		model.addAttribute("svs", sinhViens);
		return "studentList";
	}
}
