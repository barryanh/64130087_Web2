package thiGK.ntu64130087.TruongQuocAnh_ThiGK.controller;


import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Topic;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.service.TopicService;

@Controller
@RequestMapping("/topic")
public class TopicController {
	private final TopicService topicService;

    public TopicController(TopicService topicService) {
        this.topicService = topicService;
    }

    @GetMapping("/all")
    public String listTopics(Model model) {
        model.addAttribute("topics", topicService.getAllTopics());
        return "topic-list";
    }

    @GetMapping("/new")
    public String showAddForm() {
        return "topic-add";
    }

    @PostMapping("/new")
    public String addTopic(@ModelAttribute Topic topic) {
        topicService.addTopic(topic);
        return "redirect:/topic/all";
    }

    @GetMapping("/view/{id}")
    public String viewTopic(@PathVariable int id, Model model) {
        model.addAttribute("topic", topicService.getTopicById(id));
        return "topic-view";
    }

    @GetMapping("/delete/{id}")
    public String deleteTopic(@PathVariable int id) {
        topicService.deleteTopic(id);
        return "redirect:/topic/all";
    }
}
