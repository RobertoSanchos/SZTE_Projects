package hu.techbazaar;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;


import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;

public class categories_activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_categories);

        setSupportActionBar(findViewById(R.id.toolbar));

    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId() == R.id.search) return true;
        else if (item.getItemId() == R.id.cart) return true;
        else if (item.getItemId() == R.id.settings) return true;
        else if (item.getItemId() == R.id.fav) return true;
        else if (item.getItemId() == R.id.logout) {
            FirebaseAuth.getInstance().signOut();
            finish();
            Intent Start_intent = new Intent(this, Start_activity.class);
            startActivity(Start_intent);
            Toast.makeText(categories_activity.this, "Kijelentkezve!", Toast.LENGTH_SHORT).show();
            return true;
        }
        else return super.onOptionsItemSelected(item);
    }
    public void back_to_home(){
        Intent home_intent = new Intent(this, Home_activity.class);
        startActivity(home_intent);
    }
}