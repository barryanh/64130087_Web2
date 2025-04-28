package thiGK.ntu64130087.TruongQuocAnh_LamLai_GK.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class DashboardController {
	@GetMapping("/")
	public String getHomePage() {
		return "index";
	}
}
