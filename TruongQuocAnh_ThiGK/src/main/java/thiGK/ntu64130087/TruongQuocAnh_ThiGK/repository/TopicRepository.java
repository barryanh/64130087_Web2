package thiGK.ntu64130087.TruongQuocAnh_ThiGK.repository;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Repository;

import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Topic;

@Repository
public class TopicRepository {
	private List<Topic> topics = new ArrayList<>();
	
	public TopicRepository() {
        topics.add(new Topic(1, "AI", "Artificial Intelligence", 101, "Research"));
        topics.add(new Topic(2, "Web Development", "Full Stack Development", 102, "Development"));
    }

    public List<Topic> findAll() {
        return topics;
    }

    public Topic findById(int id) {
        return topics.stream().filter(t -> t.getId() == id).findFirst().orElse(null);
    }

    public void addTopic(Topic topic) {
        topics.add(topic);
    }

    public void deleteTopic(int id) {
        topics.removeIf(t -> t.getId() == id);
    }
}
