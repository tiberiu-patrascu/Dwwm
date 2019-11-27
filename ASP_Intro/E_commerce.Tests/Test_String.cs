using E_commerce.Models;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace E_commerce.Tests
{
    [TestClass]
    public class Test_String
    {
        [TestMethod]
        public void Test_SHA()
        {
            string password = "azerty";

            password = password.Sha256();

            Assert.AreEqual("azerty", null);
        }
    }
}
