package vemoni.edu.SB_TruyenDuLieuSangView.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import vemoni.edu.SB_TruyenDuLieuSangView.model.SinhVien;
import vemoni.edu.SB_TruyenDuLieuSangView.model.SinhVienList;

@Controller
public class SinhVienListController {
	SinhVienList sinhVienList = new SinhVienList();
	
	public SinhVienListController() {
        sinhVienList.addSinhVien(new SinhVien("64130087", "Trương Quốc Anh", 2004, "Nam"));
        sinhVienList.addSinhVien(new SinhVien("64130088", "Nguyễn Văn A", 2005, "Nam"));
    }

    @GetMapping("/sinhvienlist")
    public String getSinhVien(Model model) {
        model.addAttribute("sinhViens", sinhVienList.getSinhViens());
        return "sinhvienlist"; 
    }
}		
