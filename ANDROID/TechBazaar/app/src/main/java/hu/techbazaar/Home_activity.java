package hu.techbazaar;

import android.content.Intent;
import android.content.res.TypedArray;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.firebase.auth.FirebaseAuth;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Home_activity extends AppCompatActivity {
    private RecyclerView home_view;
    private ArrayList<items> home_items;
    private Home_adapter iadapter;
    private TextView highlighted;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        setSupportActionBar(findViewById(R.id.toolbar));
        home_view = findViewById(R.id.home_content);
        home_view.setLayoutManager(new GridLayoutManager(this, 2));

        home_items = new ArrayList<>();
        load_data();

        iadapter = new Home_adapter(this, home_items);
        home_view.setAdapter(iadapter);

        highlighted = findViewById(R.id.highlighted);
        Animation slideIn = AnimationUtils.loadAnimation(this, R.anim.slide);
        highlighted.startAnimation(slideIn);



        RecyclerView categoryRecycler = findViewById(R.id.category_Recycler);
        LinearLayoutManager layoutManager = new LinearLayoutManager(this, LinearLayoutManager.HORIZONTAL, false);
        categoryRecycler.setLayoutManager(layoutManager);

        List<String> categories = Arrays.asList("Alaplap", "Processzor", "Memória", "Videokárrtya","Monitor",
                "SSD/HDD", "Tápegység", "Számítógépház", "Hűtés", "Nyomtató/szkenner",
                "Billentyűzet/egér", "Hangszóró", "Kábel");
        Category_adapter adapter = new Category_adapter(this, categories, selectedCategory -> {

        });
        categoryRecycler.setAdapter(adapter);

    }

    private void load_data() {
        String[] items_name = getResources().getStringArray(R.array.items_names);
        String[] items_description = getResources().getStringArray(R.array.items_description);
        String[] items_price = getResources().getStringArray(R.array.items_prices);
        TypedArray items_images = getResources().obtainTypedArray(R.array.items_images);
        TypedArray items_rated = getResources().obtainTypedArray(R.array.items_rates);

        home_items.clear();

        for (int i = 0; i < items_name.length;i++){
            home_items.add(new items(items_name[i], items_description[i],
                    items_price[i], items_images.getResourceId(i,0), items_rated.getFloat(i, 0)));
        }
        items_images.recycle();

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
            Toast.makeText(Home_activity.this, "Kijelentkezve!", Toast.LENGTH_SHORT).show();
            return true;
        }
        else return super.onOptionsItemSelected(item);
    }
}