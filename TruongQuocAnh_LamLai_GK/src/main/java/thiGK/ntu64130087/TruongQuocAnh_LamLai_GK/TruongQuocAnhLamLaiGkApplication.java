package thiGK.ntu64130087.TruongQuocAnh_LamLai_GK;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import nz.net.ultraq.thymeleaf.layoutdialect.LayoutDialect;


@SpringBootApplication
public class TruongQuocAnhLamLaiGkApplication {

	public static void main(String[] args) {
		SpringApplication.run(TruongQuocAnhLamLaiGkApplication.class, args);
	}

	@Bean
	public LayoutDialect layoutDialect() {
	  return new LayoutDialect();
	}
}
