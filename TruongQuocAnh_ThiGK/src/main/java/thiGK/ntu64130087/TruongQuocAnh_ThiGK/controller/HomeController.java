package thiGK.ntu64130087.TruongQuocAnh_ThiGK.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import thiGK.ntu64130087.TruongQuocAnh_ThiGK.service.StudentService;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.service.TopicService;

@Controller
public class HomeController {
	private final StudentService studentService;
    private final TopicService topicService;

    public HomeController(StudentService studentService, TopicService topicService) {
        this.studentService = studentService;
        this.topicService = topicService;
    }
 
    @GetMapping({"/", "/dashboard"})
    public String dashboard(Model model) {
        model.addAttribute("students", studentService.getAllStudents());
        model.addAttribute("topics", topicService.getAllTopics());
        model.addAttribute("username", "Student Name");

        return "dashboard";
    }
}
