package vemoni.edu.SB_TruyenDuLieuSangView.model;

import java.util.ArrayList;
import java.util.List;

public class SinhVienList {
	List<SinhVien> sinhViens;

    public SinhVienList() {
        this.sinhViens = new ArrayList<>();
    }

    public void addSinhVien(SinhVien sinhVien) {
        this.sinhViens.add(sinhVien);
    }

    public List<SinhVien> getSinhViens() {
        return sinhViens;
    }

    public SinhVien getSinhVienByMSSV(String mssv) {
        for (SinhVien sv : sinhViens) {
            if (sv.getMssv().equals(mssv)) {
                return sv;
            }
        }
        return null;
    }
}
