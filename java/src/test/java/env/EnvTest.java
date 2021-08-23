package env;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertTrue;

class EnvTest {
    @Test
    void apply() {
        assertTrue(Env.java().startsWith("11"));
    }
}
