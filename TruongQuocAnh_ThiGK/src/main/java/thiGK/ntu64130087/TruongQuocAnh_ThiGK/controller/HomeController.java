package thiGK.ntu64130087.TruongQuocAnh_ThiGK.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {
	@GetMapping({"/", "/dashboard"})
	public String dashboard(Model model) {
        model.addAttribute("username", "Student Name");
        return "dashboard";
    }
}
