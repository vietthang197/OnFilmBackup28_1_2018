package tagroup.thangducanh.com.studiobackup;

import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;

public class DetailMoviesActivity extends AppCompatActivity {

    private ImageView imgPhim,imgPhim2;
    private TextView txtTenPhim;
    private Button btnXem;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_movies);

        Intent intent = getIntent();
        final int id_phim = intent.getIntExtra("id_phim",0);

        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                new JSON().execute("http://35.187.247.104/OnFilm/services/getItemPhim.php?id_film_request="+id_phim);
            }
        });

    }

    private void initView(Phim p) {
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        imgPhim = findViewById(R.id.imgPhim);
        imgPhim2 = findViewById(R.id.imgPhim2);
        txtTenPhim = findViewById(R.id.txtTenPhim);
        btnXem = findViewById(R.id.btnXem);


        Picasso.with(this).load(p.getLink_image_phim()).into(imgPhim);
        Picasso.with(this).load(p.getLink_image_phim()).into(imgPhim2);
        txtTenPhim.setText(p.getTenphim());

        final Phim  p_const = p;
        btnXem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(DetailMoviesActivity.this,WatchMoviesActivity.class);
                intent.putExtra("link_phim",p_const.getLink());
                startActivity(intent);
            }
        });
    }

    class JSON extends AsyncTask<String,Integer,String>{

        @Override
        protected String doInBackground(String... params) {
            return docNoiDung_Tu_URL(params[0]);
        }

        @Override
        protected void onPostExecute(String s) {
            try {
                JSONArray mang = new JSONArray(s);
                JSONObject phims = mang.getJSONObject(0);
                Phim p = new Phim(phims.getInt("id"),phims.getString("theloai"),phims.getString("link"),phims.getString("tenphim"),phims.getString("iframe"));
                initView(p);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    private String docNoiDung_Tu_URL(String theUrl){
        StringBuilder content = new StringBuilder();
        try    {
            // create a url object
            URL url = new URL(theUrl);

            // create a urlconnection object
            URLConnection urlConnection = url.openConnection();

            // wrap the urlconnection in a bufferedreader
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(urlConnection.getInputStream()));

            String line;

            // read from the urlconnection via the bufferedreader
            while ((line = bufferedReader.readLine()) != null){
                content.append(line + "\n");
            }
            bufferedReader.close();
        }
        catch(Exception e)    {
            e.printStackTrace();
        }
        return content.toString();
    }





    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case android.R.id.home:
                finish();
                return true;

            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    public void onBackPressed() {
        finish();
    }
}
