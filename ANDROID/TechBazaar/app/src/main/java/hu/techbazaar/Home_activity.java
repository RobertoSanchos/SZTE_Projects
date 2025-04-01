package hu.techbazaar;

import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;


import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

import com.google.firebase.auth.FirebaseAuth;

import java.util.ArrayList;

public class Home_activity extends AppCompatActivity {
    private RecyclerView home_view;
    private ArrayList<items> home_items;
    private HomeAdapter iadapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

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
        else if (item.getItemId() == R.id.notif) return true;
        else if (item.getItemId() == R.id.fav) return true;
        else if (item.getItemId() == R.id.logout) {
            FirebaseAuth.getInstance().signOut();
            finish();
            return true;
        }
        else return super.onOptionsItemSelected(item);
    }
}