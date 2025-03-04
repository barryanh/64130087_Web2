package vemoni.edu.FirstSpringBootProject.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {
	// Xây dựng action
		// mapping URl
	@GetMapping("/")
	public String trangChu() {
		return "index";
	}
}
