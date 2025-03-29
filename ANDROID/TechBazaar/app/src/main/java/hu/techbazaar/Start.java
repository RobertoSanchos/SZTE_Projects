package hu.techbazaar;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;


import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;


public class Start extends AppCompatActivity {
    private static final int SK = 34788;

    EditText login_email;
    EditText password;
    TextView ch;

    private FirebaseAuth Main_Auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        login_email = findViewById(R.id.login_email);
        password = findViewById(R.id.password);
        ch = findViewById(R.id.icheck);
        Main_Auth = FirebaseAuth.getInstance();
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

        if(!email.isEmpty() && !jelszo.isEmpty()) {
            Main_Auth.signInWithEmailAndPassword(email, jelszo).addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (task.isSuccessful()) {
                        home(); // főkép22
                    } else {
                        ch.setText(R.string.fail_sign_in);
                    }
                }
            });
        }
        else{ch.setText(R.string.Missing_field);}
    }

    public void signInWithGuest(View view) {
        Main_Auth.signInAnonymously().addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                if (task.isSuccessful()) {
                    home();
                } else {
                    ch.setText(R.string.fail_sign_in);
                }
            }
        });
    }




}