package thiGK.ntu64130087.TruongQuocAnh_ThiGK.service;

import java.util.List;

import org.springframework.stereotype.Service;

import thiGK.ntu64130087.TruongQuocAnh_ThiGK.model.Student;
import thiGK.ntu64130087.TruongQuocAnh_ThiGK.repository.StudentRepository;

@Service
public class StudentService {
	private final StudentRepository repository;

    public StudentService(StudentRepository repository) {
        this.repository = repository;
    }

    public List<Student> getAllStudents() {
        return repository.findAll();
    }

    public Student getStudentById(int id) {
        return repository.findById(id);
    }

    public void addStudent(Student student) {
        repository.addStudent(student);
    }

    public void deleteStudent(int id) {
        repository.deleteStudent(id);
    }
}
