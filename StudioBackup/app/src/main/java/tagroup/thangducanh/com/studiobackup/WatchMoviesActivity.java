package tagroup.thangducanh.com.studiobackup;

import android.content.Intent;
import android.media.MediaPlayer;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.LinearLayout;
import android.widget.Toast;

import com.universalvideoview.UniversalMediaController;
import com.universalvideoview.UniversalVideoView;

import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;

public class WatchMoviesActivity extends AppCompatActivity implements UniversalVideoView.VideoViewCallback {

    private UniversalVideoView mVideoView;
    private UniversalMediaController mMediaController;
    private LinearLayout layoutVideo,layout_content;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_watch_movies);

        Intent intent = getIntent();
        final String link_phim = intent.getStringExtra("link_phim");

        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                new JSON().execute("http://35.187.247.104/OnFilm/services/api_get_link_xem_phim.php?link="+link_phim);
            }
        });
    }

    public void initMedia(String link){
        mVideoView = (UniversalVideoView) findViewById(R.id.videoView);

        mMediaController = (UniversalMediaController) findViewById(R.id.media_controller);

        mVideoView.setMediaController(mMediaController);
        mVideoView.setVideoPath(link);
        mVideoView.start();
        mVideoView.setVideoViewCallback(this);

        layoutVideo = findViewById(R.id.layoutVideo);
        layout_content = findViewById(R.id.layout_content);
    }

    @Override
    public void onScaleChange(boolean isFullscreen) {
        if(isFullscreen){
            layout_content.setVisibility(LinearLayout.GONE);
        }
    }

    @Override
    public void onPause(MediaPlayer mediaPlayer) {

    }

    @Override
    public void onStart(MediaPlayer mediaPlayer) {

    }

    @Override
    public void onBufferingStart(MediaPlayer mediaPlayer) {

    }

    @Override
    public void onBufferingEnd(MediaPlayer mediaPlayer) {

    }

    class JSON extends AsyncTask<String,Integer,String>{
        @Override
        protected String doInBackground(String... params) {
            return docNoiDung_Tu_URL(params[0]);
        }

        @Override
        protected void onPostExecute(String s) {
            // nhận link xem phim tại đây
            initMedia(s);
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
    public void onBackPressed() {
        finish();
    }
}
