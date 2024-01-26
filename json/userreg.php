package com.example.aryanmuzaffarz.restaurant;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    private EditText r_name,r_email,r_uname,r_mobile,r_password;
    private Button btn_regiter;
    private ProgressBar loading;
    private static String URL_REGIST = "http://192.168.10.9/FYP/foodfun/json/UserRegister.php" ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        loading=findViewById(R.id.loading);
        r_name=findViewById(R.id.r_name);
        r_email=findViewById(R.id.r_email);
        r_uname=findViewById(R.id.r_uname);
        r_mobile=findViewById(R.id.r_mobile);
        r_password=findViewById(R.id.r_password);
       btn_regiter=findViewById(R.id.btn_regiter);

      btn_regiter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Regist();
            }
        });

    }
    private void Regist(){
        //........................................................................
        JSONObject jas=new JSONObject();
        jas.

        ///.....................................................................
        loading.setVisibility(View.VISIBLE);
        btn_regiter.setVisibility(View.GONE);
        final String r_name=this.r_name.getText().toString().trim();
        final String r_email=this.r_email.getText().toString().trim();
        final String r_uname=this.r_uname.getText().toString().trim();
       final String r_mobile=this.r_mobile.getText().toString().trim();
        final String r_password=this.r_password.getText().toString().trim();
        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL_REGIST,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                     try{
                         JSONObject jsonObject=new JSONObject(response);
                         String success=jsonObject.getString("success");
                         if(success.equals("1")){
                             Toast.makeText(RegisterActivity.this, "Registration success", Toast.LENGTH_SHORT).show();

                         }

                     }
                     catch (JSONException e) {
                         e.printStackTrace();
                         Toast.makeText(RegisterActivity.this, "Registration Failed"+e.toString(), Toast.LENGTH_LONG).show();
                         loading.setVisibility(View.GONE);
                         btn_regiter.setVisibility(View.VISIBLE);
                     }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(RegisterActivity.this, "Registration Failed"+error.toString(), Toast.LENGTH_LONG).show();
                        loading.setVisibility(View.GONE);
                        btn_regiter.setVisibility(View.VISIBLE);

                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> params=new HashMap<>();
                params.put("r_name",r_name);
                params.put("r_email",r_email);
                params.put("r_uname",r_uname);
                params.put("r_mobile",r_mobile);
                params.put("r_password",r_password);
                return params;
            }
        };
        RequestQueue requestQueue=Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
