package hu.techbazaar;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class Reg_activity extends AppCompatActivity {
    private static final int SK = 34788;
    EditText new_username, email, password_1, password_2;
    CheckBox ch_1, ch_2;

    private FirebaseAuth first_Auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reg);

        int sk = getIntent().getIntExtra("SK", 0);
        if(sk != SK){
            finish();
        }

        new_username = findViewById(R.id.new_username);
        email = findViewById(R.id.email);
        password_1 = findViewById(R.id.password_1);
        password_2 = findViewById(R.id.password_2);
        ch_1 = findViewById(R.id.checkBox1);
        ch_2 = findViewById(R.id.checkBox2);

        first_Auth = FirebaseAuth.getInstance();

    }

    public void register(View view) {
        String username = new_username.getText().toString();
        String email_address = email.getText().toString();
        String p1 = password_1.getText().toString();
        String p2 = password_2.getText().toString();
        boolean cs1 = ch_1.isChecked();
        boolean cs2 = ch_2.isChecked();

        if (TextUtils.isEmpty(username))
            Toast.makeText(this, "Nem adtál meg felhasználónevet!", Toast.LENGTH_SHORT).show();
        else if (TextUtils.isEmpty(email_address))
            Toast.makeText(this, "Nem adtál meg email címet!", Toast.LENGTH_SHORT).show();
        else if (TextUtils.isEmpty(p1))
            Toast.makeText(this, "Nem adtál meg jelszót!", Toast.LENGTH_SHORT).show();
        else if (!p1.equals(p2))
            Toast.makeText(this, "Nem egyeznek a jelszók!", Toast.LENGTH_SHORT).show();
        else if (p1.length() < 6)
            Toast.makeText(this, "A jelszónak legalább 6 karakter hosszúnak kell lennie!", Toast.LENGTH_SHORT).show();
        else if (!cs1 || !cs2)
            Toast.makeText(this, "Nem fogadtad el a feltételeket!", Toast.LENGTH_SHORT).show();
        else {
            first_Auth.createUserWithEmailAndPassword(email_address, p1).addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (task.isSuccessful()) {
                        Toast.makeText(Reg_activity.this, "Sikeres regisztráció!", Toast.LENGTH_SHORT).show();
                        home();
                    } else {
                        Toast.makeText(Reg_activity.this, "Sikertelen regisztráció: "
                                + task.getException().getMessage(), Toast.LENGTH_LONG).show();
                    }
                }
            });
        }
    }

    public void ignore(View view) {finish();}

    private void home(){
        Intent home_intent = new Intent(this, Home_activity.class);
        startActivity(home_intent);
    }
}