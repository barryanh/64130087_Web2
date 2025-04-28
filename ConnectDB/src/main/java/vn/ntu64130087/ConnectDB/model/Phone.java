package vn.ntu64130087.ConnectDB.model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "DienThoai")
public class Phone {
	@Id
	@Column(name = "id")
	private int id;

	@Column(name = "TenĐT", nullable = false, length = 255)
    private String tenDT;
	
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getTenSP() {
		return tenDT;
	}

	public void setTenDT(String dt) {
		this.tenDT = dt;
	}

	public Phone() {
		super();
	}
}
