package vemoni.edu.LoginVemOniV2.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;
import jakarta.servlet.http.HttpServletRequest;


@Controller
public class LoginVemOniV2Controller {
	@GetMapping("/login")
    public String showLoginForm() {
        return "login";
    }
    
    @PostMapping("/login")
    public ModelAndView login(HttpServletRequest request, 
                              @RequestParam("id") String id, 
                              @RequestParam("password") String password) {
        
        ModelAndView modelAndView = new ModelAndView();
        
        if ("vemoni".equals(id) && "123456".equals(password)) {
            modelAndView.setViewName("dashboard");
        } else {
            modelAndView.setViewName("login");
            modelAndView.addObject("error", "Sai thông tin đăng nhập");
        }
        
        return modelAndView;
    }
}
