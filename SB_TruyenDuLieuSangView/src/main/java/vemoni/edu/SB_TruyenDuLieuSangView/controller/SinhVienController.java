package vemoni.edu.SB_TruyenDuLieuSangView.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.ui.Model;
import vemoni.edu.SB_TruyenDuLieuSangView.model.SinhVien;

@Controller
public class SinhVienController {
	@GetMapping("/sinhvien")
	public String getSinhVien(Model model) {
        SinhVien sinhVien = new SinhVien("64130087", "Trương Quốc Anh", 2004, "Nam");
        model.addAttribute("sinhVien", sinhVien);
        return "sinhvien";
    }
}
