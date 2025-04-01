package thiGK.ntu64130087.TruongQuocAnh_ThiGK.controller;


import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Student;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.service.StudentService;

@Controller
@RequestMapping("/student")
public class StudentController {
	private final StudentService studentService;

    public StudentController(StudentService studentService) {
        this.studentService = studentService;
    }

    @GetMapping("/all")
    public String listStudents(Model model) {
        model.addAttribute("students", studentService.getAllStudents());
        return "student-list";
    }

    @GetMapping("/new")
    public String showAddForm() {
        return "student-add";
    }

    @PostMapping("/new")
    public String addStudent(@ModelAttribute Student student) {
        studentService.addStudent(student);
        return "redirect:/student/all";
    }

    @GetMapping("/view/{id}")
    public String viewStudent(@PathVariable int id, Model model) {
        model.addAttribute("student", studentService.getStudentById(id));
        return "student-view";
    }

    @GetMapping("/delete/{id}")
    public String deleteStudent(@PathVariable int id) {
        studentService.deleteStudent(id);
        return "redirect:/student/all";
    }
}
