package vn.ntu64130087.ConnectDB.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class PhoneController {
	@Autowired
	IPhone dt;
	
	@GetMapping("/phone/all")
	public String getAll() {
		dt.count();
		return null;
	}
}
