package thiGK.ntu64130087.TruongQuocAnh_ThiGK.service;

import java.util.List;

import org.springframework.stereotype.Service;

import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Topic;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.repository.TopicRepository;

@Service
public class TopicService {
	private final TopicRepository repository;

    public TopicService(TopicRepository repository) {
        this.repository = repository;
    }

    public List<Topic> getAllTopics() {
        return repository.findAll();
    }

    public Topic getTopicById(int id) {
        return repository.findById(id);
    }

    public void addTopic(Topic topic) {
        repository.addTopic(topic);
    }

    public void deleteTopic(int id) {
        repository.deleteTopic(id);
    }
}
