package thiGK.ntu64130087.TruongQuocAnh_ThiGK.repository;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Repository;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Student;

@Repository
public class StudentRepository {
	private List<Student> students = new ArrayList<>();

    public StudentRepository() {
        students.add(new Student(1, "John Doe", 1));
        students.add(new Student(2, "Jane Smith", 2));
    }

    public List<Student> findAll() {
        return students;
    }

    public Student findById(int id) {
        return students.stream().filter(s -> s.getId() == id).findFirst().orElse(null);
    }

    public void addStudent(Student student) {
        students.add(student);
    }

    public void deleteStudent(int id) {
        students.removeIf(s -> s.getId() == id);
    }
}
