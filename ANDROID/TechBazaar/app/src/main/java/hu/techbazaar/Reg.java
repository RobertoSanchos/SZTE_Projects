package hu.techbazaar;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class Reg extends AppCompatActivity {
    private static final int SK = 34788;
    EditText new_username;
    EditText email;
    EditText password_1;
    EditText password_2;
    CheckBox ch_1;
    CheckBox ch_2;
    TextView ch;

    private FirebaseAuth first_Auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reg);

        int sk = getIntent().getIntExtra("SK", 0);
        if(sk != 34788){
            finish();
        }

        new_username = findViewById(R.id.new_username);
        email = findViewById(R.id.email);
        password_1 = findViewById(R.id.password_1);
        password_2 = findViewById(R.id.password_2);
        ch_1 = findViewById(R.id.checkBox1);
        ch_2 = findViewById(R.id.checkBox2);
        ch = findViewById(R.id.icheck);

        first_Auth = FirebaseAuth.getInstance();
    }

    public void register(View view) {
        String username = new_username.getText().toString();
        String email_address = email.getText().toString();
        String p1 = password_1.getText().toString();
        String p2 = password_2.getText().toString();
        boolean cs1 = ch_1.isChecked();
        boolean cs2 = ch_2.isChecked();

        if (!p1.equals(p2)) ch.setText("Nem egyeznek a jelszók!");
        else if (!cs1 || !cs2) ch.setText("Nem fogadtad el a szükséges feltételeket!");
        else if (p1.length() < 6) ch.setText("A jelszónak legalább 6 karakternek kell lennie!");
        else {
            first_Auth.createUserWithEmailAndPassword(email_address, p1).addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (task.isSuccessful()) {
                        home();
                    } else {
                        Toast.makeText(Reg.this, "Sikertelen regisztráció: "
                                + task.getException().getMessage(), Toast.LENGTH_LONG).show();
                    }
                }
            });
        }
    }

    public void ignore(View view) {finish();}

    private void home(){
        Intent home_intent = new Intent(this, Home.class);
        startActivity(home_intent);
    }
}