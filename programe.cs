using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {
            string conf = "Server=localhost;Database=mydb;User=**;Pwd=***";
            string sql = "select * from mytable";
            SqlConnection conn = new SqlConnection(conf);

            try {
                conn.Open();
                SqlCommand cmd = new SqlCommand(sql,conn);
                SqlDataReader reader = cmd.ExecuteReader();
                while (reader.Read()) {
                    Console.WriteLine(reader["name"].ToString());
                    Console.WriteLine(reader["note"].ToString());
                }
                reader.Close();
                
            } catch {
                Console.WriteLine("连接失败");
            }
            Console.ReadKey();
        }
    }
}
