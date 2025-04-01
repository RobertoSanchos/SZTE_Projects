package hu.techbazaar;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;


import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;


public class Start extends AppCompatActivity {
    private static final int SK = 34788;

    EditText login_email, password;

    private ProgressDialog load;

    private FirebaseAuth Main_Auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        login_email = findViewById(R.id.login_email);
        password = findViewById(R.id.password);
        Main_Auth = FirebaseAuth.getInstance();

        //load = new ProgressDialog(this);
    }

    public void register(View view) {
        Intent reg_intent = new Intent(this, Reg.class);
        reg_intent.putExtra("SK", SK);
        startActivity(reg_intent);
    }
    private void home(){
        Intent home_intent = new Intent(this, Home.class);
        startActivity(home_intent);
    }

    public void signInWithEmail(View view) {
        String email = login_email.getText().toString();
        String jelszo = password.getText().toString();

        if(TextUtils.isEmpty(email))
            Toast.makeText(this, "Nem adtad meg az email címed!", Toast.LENGTH_SHORT).show();
        else if(TextUtils.isEmpty(jelszo))
            Toast.makeText(this, "Nem adtad meg a jelszódat!", Toast.LENGTH_SHORT).show();
        else {
            Main_Auth.signInWithEmailAndPassword(email, jelszo).addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (task.isSuccessful()) {
                        Toast.makeText(Start.this, "Sikeres bejelentkezés!", Toast.LENGTH_SHORT).show();
                       // load.setTitle("Sikeres bejelentkezés");
                       // load.setMessage("Rögtön továbbítunk!");
                       // load.setCanceledOnTouchOutside(false);
                       // load.show();
                        home();
                    } else {
                        Toast.makeText(Start.this, "Sikertelen belépés: "
                                + task.getException().getMessage(), Toast.LENGTH_LONG).show();
                    }
                }
            });
        }

    }

    public void signInWithGuest(View view) {
        Main_Auth.signInAnonymously().addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                if (task.isSuccessful()) {
                    home();
                } else {
                    Toast.makeText(Start.this, "Sikertelen belépés: "
                            + task.getException().getMessage(), Toast.LENGTH_LONG).show();
                }
            }
        });
    }
}